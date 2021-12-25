package com.example.sedaya.core.data.source.remote.request

data class UpdateProfileRequest(
    val usr_id: Int,
    val nama: String? = null,
    val email: String? = null,
    val telp: String? = null,
    )