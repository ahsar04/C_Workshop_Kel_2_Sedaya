package com.example.sedaya.ui.auth

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.sedaya.NavigationActivity
import com.example.sedaya.core.data.source.remote.network.State
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.databinding.ActivityLoginBinding
import com.inyongtisto.myhelper.extension.*
import org.koin.androidx.viewmodel.ext.android.viewModel

class LoginActivity : AppCompatActivity() {

    private val viewModel : AuthViewModel by viewModel()

    private var _binding: ActivityLoginBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        _binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setData()
        mainButton()
    }

    private fun mainButton() {
        binding.btnMasuk.setOnClickListener {
            login()
        }
        binding.btnDaftar.setOnClickListener {
            intentActivity(RegisterActivity::class.java)
        }
    }

    private fun setData() {

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
                    dismisLoading()
                    showToast("Selamat datang " + it?.data?.nama)
                    pushActivity(NavigationActivity::class.java)
                }
                State.ERROR -> {
                    dismisLoading()
                    toastError(it?.message?: "Error")
                }
                State.LOADING -> {
                    showLoading()
                }
            }
        })
    }
}