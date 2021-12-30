package com.example.sedaya.core.data.source.model

data class Seni (
    val sn_id: String? = null,
    val snm_id: String? = null,
    val nama_snm: String?,
    val alamat: String?,
    val judul: String?,
    val kategori: String?,
    val jenis: String?,
    val keterangan: String?,
    val harga: Int?,
    val image: Int,
    val status: String?,
)