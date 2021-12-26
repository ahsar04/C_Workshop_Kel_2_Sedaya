package com.example.sedaya.ui.home

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.example.sedaya.core.data.source.local.DummyData
import com.example.sedaya.core.data.source.model.Category
import com.example.sedaya.core.data.source.model.Product
import com.example.sedaya.core.data.source.model.Slider
import java.util.*

class HomeViewModel : ViewModel() {

    val listCategory : LiveData<List<Category>> = MutableLiveData<List<Category>>().apply {
        value = DummyData.listCategory
    }

    val listSlider : LiveData<List<Slider>> = MutableLiveData<List<Slider>>().apply {
        value = DummyData.listSlider
    }

    val listProduct : LiveData<List<Product>> = MutableLiveData<List<Product>>().apply {
        value = DummyData.listProduct
    }
}