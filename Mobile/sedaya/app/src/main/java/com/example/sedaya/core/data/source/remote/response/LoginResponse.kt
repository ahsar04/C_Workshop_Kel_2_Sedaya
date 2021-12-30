package com.example.sedaya.core.data.source.remote.response

import com.example.sedaya.core.data.source.model.Seni
import com.example.sedaya.core.data.source.model.User

data class LoginResponse (
        val code: Int? = null,
        val message: String? = null,
        val data: User? = null,
        val seni : Seni? = null,
)