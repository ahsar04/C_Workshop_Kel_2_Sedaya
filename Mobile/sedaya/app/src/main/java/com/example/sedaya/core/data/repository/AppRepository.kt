package com.example.sedaya.core.data.repository

import android.util.Log
import com.example.sedaya.core.data.source.local.LocalDataSource
import com.example.sedaya.core.data.source.remote.RemoteDataSorce
import com.example.sedaya.core.data.source.remote.network.Resource
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.example.sedaya.core.data.source.remote.request.RegisterRequest
import com.example.sedaya.core.data.source.remote.request.UpdateProfileRequest
import com.example.sedaya.util.Prefs
import com.inyongtisto.myhelper.extension.getErrorBody
import com.inyongtisto.myhelper.extension.logs
import kotlinx.coroutines.flow.flow
import okhttp3.MultipartBody
import java.lang.Error
import java.lang.Exception

class AppRepository(val local : LocalDataSource, val remote : RemoteDataSorce) {

    fun login(data: LoginRequest) = flow {
        emit(Resource.loading(null))
        try {
            remote.login(data).let {
                if (it.isSuccessful){
                    Prefs.isLogin = true
                    val body = it.body()
                    val user = body?.data
                    Prefs.setUser(user)
                    emit(Resource.success(user))
                    logs("succes:" + body.toString())
                } else {
                    emit(Resource.error(it.getErrorBody()?.message?: "Default error",null))
                    logs("Error:" + "Keterangan Error")
                }
            }
        } catch (e: Exception) {
            emit(Resource.error(e.message?: "Terjadi kesalahan", null))
            logs("Error:" + e.message)
        }
    }

    fun register(data: RegisterRequest) = flow {
        emit(Resource.loading(null))
        try {
            remote.register(data).let {
                if (it.isSuccessful){
                    Prefs.isLogin = true
                    val body = it.body()
                    val user = body?.data
                    Prefs.setUser(user)
                    emit(Resource.success(user))
                    logs("succes:" + body.toString())
                } else {
                    emit(Resource.error(it.getErrorBody()?.message ?: "Default errorr",null))
                    logs("Error:" + "Keterangan Error")
                }
            }
        } catch (e: Exception) {
            emit(Resource.error(e.message?: "Terjadi kesalahan", null))
            logs("Error:" + e.message)
        }
    }

    fun updateUser(data: UpdateProfileRequest) = flow {
        emit(Resource.loading(null))
        try {
            remote.updateUser(data).let {
                if (it.isSuccessful){
                    val body = it.body()
                    val user = body?.data
                    Prefs.setUser(user)
                    emit(Resource.success(user))
                } else {
                    emit(Resource.error(it.getErrorBody()?.message ?: "Default errorr",null))
                }
            }
        } catch (e: Exception) {
            emit(Resource.error(e.message?: "Terjadi kesalahan", null))
        }
    }

    fun uploadUser(id:Int? = null, fileImage: MultipartBody.Part? = null) = flow {
        emit(Resource.loading(null))
        try {
            remote.uploadUser(id, fileImage).let {
                if (it.isSuccessful){
                    val body = it.body()
                    val user = body?.data
                    Prefs.setUser(user)
                    emit(Resource.success(user))
                } else {
                    emit(Resource.error(it.getErrorBody()?.message ?: "Default errorr",null))
                }
            }
        } catch (e: Exception) {
            emit(Resource.error(e.message?: "Terjadi kesalahan", null))
        }
    }
}