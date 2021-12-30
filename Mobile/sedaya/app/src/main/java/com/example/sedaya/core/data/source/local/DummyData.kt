package com.example.sedaya.core.data.source.local

import com.example.sedaya.R
import com.example.sedaya.core.data.source.model.Category
import com.example.sedaya.core.data.source.model.Seni
import com.example.sedaya.core.data.source.model.Slider

object DummyData {
    val listCategory = listOf(
            Category(id = "1", name = "Tari", image = R.drawable.tari),
            Category(id = "2", name = "Rohani", image = R.drawable.rohani),
            Category(id = "3", name = "Wayang", image = R.drawable.wayang),
            Category(id = "4", name = "Musik", image = R.drawable.musik),
            Category(id = "5", name = "Lainnya", image = R.drawable.lainnya),
    )

    val listSlider = listOf(
            Slider(id = "1", name = "Slider1", image = R.drawable.asset_slider1),
            Slider(id = "2", name = "Slider2", image = R.drawable.asset_slider2),
            Slider(id = "3", name = "Slider3", image = R.drawable.asset_slider3),
    )

    val listSeni = listOf(
            Seni(sn_id = "1", snm_id = "1", nama_snm = "Raden Saifur", alamat = "Jember", judul = "Tari Saman", kategori = "Kelompok", jenis = "Tari", keterangan = "DESCRIPTION IN HERE",  harga = 800000, image = R.drawable.asset_produk1, status = "Ready"),
            Seni(sn_id = "2", snm_id = "1", nama_snm = "Ahmad Dani", alamat = "Probolinggo", judul = "Reog Ponorogo", kategori = "Kelompok", jenis = "Rohani", keterangan = "DESCRIPTION IN HERE",  harga = 700000, image = R.drawable.asset_produk2, status = "Dipesan"),
            Seni(sn_id = "3", snm_id = "1", nama_snm = "Akbar Valen", alamat = "Bondowoso", judul = "Tari Pendet", kategori = "Kelompok", jenis = "Tari", keterangan = "DESCRIPTION IN HERE",  harga = 400000, image = R.drawable.asset_produk3, status = "Dipesan"),
            Seni(sn_id = "4", snm_id = "1", nama_snm = "Ryo Pamungkas", alamat = "Jombang", judul = "Tari Kecak", kategori = "Kelompok", jenis = "Tari", keterangan = "DESCRIPTION IN HERE",  harga = 100000, image = R.drawable.asset_produk4, status = "Ready"),
            Seni(sn_id = "5", snm_id = "1", nama_snm = "Ahmad Syafii", alamat = "Situbondo", judul = "Musik Patrol", kategori = "Kelompok", jenis = "Musik", keterangan = "DESCRIPTION IN HERE",  harga = 300000, image = R.drawable.asset_produk5, status = "Ready"),
            Seni(sn_id = "6", snm_id = "1", nama_snm = "Umar Said", alamat = "Malang", judul = "Ludruk", kategori = "Individu", jenis = "Tari", keterangan = "DESCRIPTION IN HERE",  harga = 600000, image = R.drawable.asset_produk6, status = "Dipesan"),
            Seni(sn_id = "7", snm_id = "1", nama_snm = "Fandi Arsyad", alamat = "Lumajang", judul = "Wayang Kulit", kategori = "Kelompok", jenis = "Wayang", keterangan = "DESCRIPTION IN HERE",  harga = 900000, image = R.drawable.asset_produk7, status = "Ready"),
            Seni(sn_id = "8", snm_id = "1", nama_snm = "Nikmatul Arsyi", alamat = "Kediri", judul = "Hadroh Banjari", kategori = "Kelompok", jenis = "Musik", keterangan = "DESCRIPTION IN HERE",  harga = 400000, image = R.drawable.asset_produk8, status = "Dipesan"),
    )
}