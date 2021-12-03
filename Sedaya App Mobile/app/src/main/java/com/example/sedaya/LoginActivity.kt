package com.example.sedaya

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

    }

    fun onLoginClick(view: View) {
        Toast.makeText(this, "Daftar Terlebih dahulu", Toast.LENGTH_SHORT).show()
    }

}