package com.example.sedaya.ui.auth

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.sedaya.NavigationActivity
import com.example.sedaya.core.data.source.remote.network.State
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.core.data.source.remote.request.RegisterRequest
import com.example.sedaya.databinding.ActivityLoginBinding
import com.example.sedaya.databinding.ActivityRegisterBinding
import com.inyongtisto.myhelper.extension.*
import org.koin.androidx.viewmodel.ext.android.viewModel

class RegisterActivity : AppCompatActivity() {

    private val viewModel : AuthViewModel by viewModel()

    private var _binding: ActivityRegisterBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        _binding = ActivityRegisterBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setData()
        mainButton()
    }

    private fun mainButton() {
        binding.btnKliksini.setOnClickListener {
            intentActivity(LoginActivity::class.java)
        }
    }

    private fun setData() {
        binding.btnDaftar.setOnClickListener {
            register()
        }
    }

    private fun register() {

        if (binding.edtNama.isEmpty()) return
        if (binding.edtEmail.isEmpty()) return
        if (binding.edtTelp.isEmpty()) return
        if (binding.edtPassword.isEmpty()) return

        val body = RegisterRequest(
            binding.edtNama.text.toString(),
            binding.edtEmail.text.toString(),
            binding.edtTelp.text.toString(),
            binding.edtPassword.text.toString()
        )

        viewModel.register(body).observe(this, {

            when (it.state) {
                State.SUCCESS -> {
//                    dismisLoading()
                    showToast("Selamat datang " + it?.data?.nama)
                    pushActivity(NavigationActivity::class.java)
                }
                State.ERROR -> {
//                    dismisLoading()
                    toastError(it?.message?: "Error")
                }
                State.LOADING -> {
//                    showLoading()
                }
            }
        })
    }
}