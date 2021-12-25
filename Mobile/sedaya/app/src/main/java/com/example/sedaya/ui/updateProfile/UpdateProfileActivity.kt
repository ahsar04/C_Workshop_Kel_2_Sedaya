package com.example.sedaya.ui.updateProfile

import android.app.Activity
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.result.contract.ActivityResultContracts
import com.example.sedaya.NavigationActivity
import com.example.sedaya.core.data.source.remote.network.State
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.core.data.source.remote.request.RegisterRequest
import com.example.sedaya.core.data.source.remote.request.UpdateProfileRequest
import com.example.sedaya.databinding.ActivityLoginBinding
import com.example.sedaya.databinding.ActivityRegisterBinding
import com.example.sedaya.databinding.ActivityUpdateProfileBinding
import com.example.sedaya.ui.auth.AuthViewModel
import com.example.sedaya.ui.base.MyActivity
import com.example.sedaya.util.Constans
import com.example.sedaya.util.Prefs
import com.github.drjacky.imagepicker.ImagePicker
import com.inyongtisto.myhelper.extension.*
import com.squareup.picasso.Picasso
import org.koin.androidx.viewmodel.ext.android.viewModel
import java.io.File

class UpdateProfileActivity : MyActivity() {

    private val viewModel : AuthViewModel by viewModel()

    private var _binding: ActivityUpdateProfileBinding? = null
    private val binding get() = _binding!!
    private var fileImage: File? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        _binding = ActivityUpdateProfileBinding.inflate(layoutInflater)
        setContentView(binding.root)
        setToolbar(binding.toolbar,"Update Profile")

        mainButton()
        setData()
    }

    private fun setData() {
        val user = Prefs.getUser()
        if (user != null) {
            binding.apply {
                edtNama.setText(user.nama)
                edtTelp.setText(user.telp)
                edtEmail.setText(user.email)
                tvInisial.text = user.nama.getInitial()
                Picasso.get().load(Constans.USER_URL+user.foto).into(binding.imageProfile)
            }
        }
    }

    private fun mainButton() {
        binding.btnSimpan.setOnClickListener {
            if (fileImage != null) {
                upload()
            } else {
                update()
            }
        }
        binding.imageProfile.setOnClickListener {
            picImage()
        }
    }

    private fun picImage() {
        ImagePicker.with(this)
            .crop()
            .maxResultSize(1080, 1080, true)
            .createIntentFromDialog { launcher.launch(it) }
    }

    private val launcher = registerForActivityResult(ActivityResultContracts.StartActivityForResult()) {
        if (it.resultCode == Activity.RESULT_OK) {
            val uri = it.data?.data!!

            // Use the uri to load the image
            fileImage = File(uri.path!!)
            Picasso.get().load(fileImage!!).into(binding.imageProfile)
        }
    }

    private fun update() {

        if (binding.edtNama.isEmpty()) return
        if (binding.edtEmail.isEmpty()) return
        if (binding.edtTelp.isEmpty()) return

        val idUser = Integer.parseInt(Prefs.getUser()?.usr_id)
        val body = UpdateProfileRequest(
            idUser?:0,
            binding.edtNama.text.toString(),
            binding.edtEmail.text.toString(),
            binding.edtTelp.text.toString(),
        )

        viewModel.updateUser(body).observe(this, {

            when (it.state) {
                State.SUCCESS -> {
                    progress.dismiss()
                    showToast("Selamat datang " + it?.data?.nama)
                    onBackPressed()
                }
                State.ERROR -> {
                    progress.dismiss()
                    toastError(it?.message?: "Error")
                }
                State.LOADING -> {
                    progress.show()
                }
            }
        })
    }

    private fun upload() {
        val idUser = Integer.parseInt(Prefs.getUser()?.usr_id)
        val file = fileImage.toMultipartBody()

        viewModel.uploadUser(idUser, file).observe(this, {
            when (it.state) {
                State.SUCCESS -> {
                    update()
                }
                State.ERROR -> {
                    toastError(it?.message?: "Error")
                }
                State.LOADING -> {
                    progress.show()
                }
            }
        })
    }

    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return super.onSupportNavigateUp()
    }
}