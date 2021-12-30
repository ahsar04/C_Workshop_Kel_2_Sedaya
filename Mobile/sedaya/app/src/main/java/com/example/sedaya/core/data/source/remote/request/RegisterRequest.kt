package com.example.sedaya.core.data.source.remote.request

data class RegisterRequest(
    val nama: String,
    val email: String? = null,
    val telp: String? = null,
    var alamat: String? = null,
    var password: String? = null,
    )