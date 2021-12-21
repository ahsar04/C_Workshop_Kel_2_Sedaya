package com.example.sedaya.ui.login

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import com.example.sedaya.R
import com.example.sedaya.databinding.ActivityLoginBinding
import com.example.sedaya.databinding.FragmentDashboardBinding
import com.example.sedaya.util.Prefs
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

    fun setData() {
        viewModel.text.observe(this,{
            binding.edtEmail.setText(it)
        })

        binding.btnMasuk.setOnClickListener {
            viewModel.login()
        }
    }



}