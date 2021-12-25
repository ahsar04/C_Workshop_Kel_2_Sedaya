package com.example.sedaya.ui.auth

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import com.example.sedaya.core.data.repository.AppRepository
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.core.data.source.remote.request.RegisterRequest
import com.example.sedaya.core.data.source.remote.request.UpdateProfileRequest
import okhttp3.MultipartBody

class AuthViewModel (val repo:AppRepository):ViewModel() {

    fun login(data: LoginRequest) = repo.login(data).asLiveData()

    fun register(data: RegisterRequest) = repo.register(data).asLiveData()

    fun updateUser(data: UpdateProfileRequest) = repo.updateUser(data).asLiveData()

    fun uploadUser(id:Int? = null, fileImage: MultipartBody.Part? = null) = repo.uploadUser(id, fileImage).asLiveData()

}