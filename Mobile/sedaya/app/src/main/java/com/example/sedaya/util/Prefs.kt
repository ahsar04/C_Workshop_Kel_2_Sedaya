package com.example.sedaya.util

import android.app.Activity
import android.content.Context
import android.content.SharedPreferences
import com.chibatching.kotpref.KotprefModel
import com.example.sedaya.core.data.source.model.Seni
import com.example.sedaya.core.data.source.model.User
import com.inyongtisto.myhelper.extension.toJson
import com.inyongtisto.myhelper.extension.toModel

object Prefs : KotprefModel() {

    var isLogin by booleanPref(false)
    var user by stringPref()
    var seni by stringPref()

    fun setUser(data : User?) {
        user = data.toJson()
    }

    fun getUser(): User? {
        if (user.isEmpty()) return null
        return user.toModel(User::class.java)
    }

    fun setSeni(data : Seni?) {
        seni = data.toJson()
    }

    fun getSeni(): Seni? {
        if (seni.isEmpty()) return null
        return seni.toModel(Seni::class.java)
    }
}