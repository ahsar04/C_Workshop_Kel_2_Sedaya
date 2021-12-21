package com.example.sedaya.util

import android.app.Application
import com.example.sedaya.core.di.appmodule
import com.example.sedaya.core.di.repositoryModule
import com.example.sedaya.core.di.viewModelModule
import org.koin.android.ext.koin.androidContext
import org.koin.core.context.startKoin

class MyApp : Application() {
    override fun onCreate() {
        super.onCreate()
        startKoin {
            androidContext(this@MyApp)
            modules(listOf(appmodule, viewModelModule, repositoryModule))
        }
    }
}