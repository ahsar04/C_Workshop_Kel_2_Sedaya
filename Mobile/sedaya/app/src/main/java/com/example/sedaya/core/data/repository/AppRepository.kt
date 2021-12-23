package com.example.sedaya.core.data.repository

import android.util.Log
import com.example.sedaya.core.data.source.local.LocalDataSource
import com.example.sedaya.core.data.source.remote.RemoteDataSorce
import com.example.sedaya.core.data.source.remote.network.Resource
import com.example.sedaya.core.data.source.remote.request.LoginRequest
import com.inyongtisto.myhelper.extension.getErrorBody
import com.inyongtisto.myhelper.extension.logs
import kotlinx.coroutines.flow.flow
import java.lang.Error
import java.lang.Exception

class AppRepository(val local : LocalDataSource, val remote : RemoteDataSorce) {

    fun login(data: LoginRequest) = flow {
        emit(Resource.loading(null))
        try {
            remote.login(data).let {
                if (it.isSuccessful){
                    val body = it.body()
                    emit(Resource.success(body?.data))
                    logs("succes:" + body.toString())
                } else {
                    val nonNull :String = ""
                    val message :String? = null

                    var errorRespon = it.getErrorBody(ErrorCustom::class.java)?.description
                    if (errorRespon == null) {
                        errorRespon = "Default error"
                    }


                    emit(Resource.error(errorRespon,null))
                    logs("Error:" + "Keterangan Error")
                }
            }
        } catch (e: Exception) {
            emit(Resource.error(e.message?: "Terjadi kesalahan", null))
            logs("Error:" + e.message)
        }
    }
    class ErrorCustom(
        val ok: Boolean,
        val error_code: Int,
        val description: String? = null
    )
}