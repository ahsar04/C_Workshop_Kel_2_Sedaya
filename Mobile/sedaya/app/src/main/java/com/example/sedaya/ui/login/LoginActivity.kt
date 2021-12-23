package com.example.sedaya.ui.login

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.example.sedaya.R
import com.example.sedaya.core.data.source.remote.network.State
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.databinding.ActivityLoginBinding
import com.example.sedaya.databinding.FragmentDashboardBinding
import com.example.sedaya.util.Prefs
import com.inyongtisto.myhelper.extension.*
import org.koin.androidx.viewmodel.ext.android.viewModel

class LoginActivity : AppCompatActivity() {

    private val viewModel : LoginViewModel by viewModel()

    private var _binding: ActivityLoginBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        _binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setData()
    }

    private fun setData() {
        viewModel.text.observe(this,{
            binding.edtUsername.setText(it)
        })

        binding.btnMasuk.setOnClickListener {
            login()
        }
    }

    private fun login() {

        if (binding.edtUsername.isEmpty()) return
        if (binding.edtPasswword.isEmpty()) return

        val body = LoginRequest(
            binding.edtUsername.text.toString(),
            binding.edtPasswword.text.toString()
        )

        viewModel.login(body).observe(this, {

            when (it.state) {
                State.SUCCESS -> {
                    binding.pd.toGone()
                    showToast("Selamat datang " + it?.data?.nama)
                }
                State.ERROR -> {
                    binding.pd.toGone()
                    toastError(it?.message?: "Error")
                }
                State.LOADING -> {
                    binding.pd.toVisible()
                }
            }
        })
    }
}