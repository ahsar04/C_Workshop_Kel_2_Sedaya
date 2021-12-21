package com.example.sedaya.core.data.repository

import android.util.Log
import com.example.sedaya.core.data.source.local.LocalDataSource
import com.example.sedaya.core.data.source.remote.RemoteDataSorce
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.inyongtisto.myhelper.extension.logs
import kotlinx.coroutines.flow.flow
import java.lang.Exception

class AppRepository(val local : LocalDataSource, val remote : RemoteDataSorce) {

    fun login(data: LoginRequest) = flow {
        try {
            remote.login(data).let {
                if (it.isSuccessful){
                    val body = it.body()
                    emit(body)
                    logs("succes:" + body.toString())
                } else {
                    logs("Error:" + "Keterangan Error")
                }
            }
        } catch (e:Exception) {
            logs("login: error:" + e.message)
        }
    }

}