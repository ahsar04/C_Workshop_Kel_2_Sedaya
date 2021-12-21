package com.example.sedaya.ui.login

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import com.example.sedaya.core.data.repository.AppRepository
import com.example.sedaya.core.data.source.remote.request.LoginRequest

class LoginViewModel (val repo:AppRepository):ViewModel() {

    private val _text = MutableLiveData<String>().apply {
        value = "Hi, Saya Hasan"
    }
    val text: LiveData<String> = _text

    fun ubahData() {
        _text.postValue("Ini aku M Hasan John")
    }

    fun login(data: LoginRequest) = repo.login(data).asLiveData()

}