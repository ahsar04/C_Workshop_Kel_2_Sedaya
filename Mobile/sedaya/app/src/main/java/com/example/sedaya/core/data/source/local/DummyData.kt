package com.example.sedaya.core.data.source.local

import com.example.sedaya.R
import com.example.sedaya.core.data.source.model.Category
import com.example.sedaya.core.data.source.model.Product
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

    val listProduct = listOf(
            Product(id = "1", name = "Tari Saman adalah sebuah tarian suku Gayo yang biasa ditampilkan untuk merayakan peristiwa-peristiwa penting dalam adat", harga = 800000, pengiriman = "Jember", terjual = 30, rating = 5.0, discount = 0, grosir = true, image = R.drawable.asset_produk1),
            Product(id = "2", name = "Reog Ponorogo adalah tari tradisional yang berasal dari daerah Barat-Laut Provinsi Jawa Timur dan Ponorogo.", harga = 1200000, pengiriman = "Ponorogo", terjual = 9, rating = 5.0, discount = 10, grosir = true, image = R.drawable.asset_produk2),
            Product(id = "3", name = "Tari pendet adalah salah satu tari yang memiliki gerakan yang indah. Tarian ini juga menjadi salah satu budaya kebanggaan Indonesia.", harga = 800000, pengiriman = "Lumajang", terjual = 53, rating = 5.0, discount = 15, grosir = false, image = R.drawable.asset_produk3),
            Product(id = "4", name = "Tari kecak adalah seni tari yang berasal dari Bali. Seni tari kecak ini dipertunjukkan oleh puluhan penari laki-laki", harga = 1000000, pengiriman = "Kab.Probolinggo", terjual = 80, rating = 5.0, discount = 0, grosir = true, image = R.drawable.asset_produk4),
            Product(id = "5", name = "Musik patrol adalah kesenian musik tradisional yang menggunakan alat musik sederhana yaitu kentongan.", harga = 450000, pengiriman = "Bondowoso", terjual = 68, rating = 5.0, discount = 15, grosir = false, image = R.drawable.asset_produk5),
            Product(id = "6", name = "Ludruk adalah pertunjukan spekatakuler melibatkan drama dari berbagai lakon yang bertemakan mengenai kerajaan", harga = 200000, pengiriman = "Malang", terjual = 50, rating = 5.0, discount = 20, grosir = false, image = R.drawable.asset_produk6),
            Product(id = "7", name = "Wayang Kulit. Wayang adalah pertunjukan drama tradisionil yang populer sekali di Indonesia.", harga = 300000, pengiriman = "Banyuwangi", terjual = 22, rating = 5.0, discount = 0, grosir = true, image = R.drawable.asset_produk7),
            Product(id = "8", name = "Hadrah banjari merupakan jenis hadroh yang menekankan pada nada pelan dan seirama sehingga membuat pendengar merasa nyaman dengan ritmenya", harga = 500000, pengiriman = "Jombang", terjual = 11, rating = 5.0, discount = 10, grosir = false, image = R.drawable.asset_produk8),
    )
}