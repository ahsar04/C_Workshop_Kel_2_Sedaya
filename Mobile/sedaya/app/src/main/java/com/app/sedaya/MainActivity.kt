package com.app.sedaya

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import androidx.fragment.app.Fragment
import androidx.fragment.app.FragmentManager
import com.app.sedaya.activity.LoginActivity
import com.app.sedaya.activity.MasukActivity
import com.app.sedaya.fragment.AkunFragment
import com.app.sedaya.fragment.HomeFragment
import com.app.sedaya.fragment.KeranjangFragment
import com.app.sedaya.helper.SharedPref
import com.google.android.material.bottomnavigation.BottomNavigationView

class MainActivity : AppCompatActivity() {

    //Panggil frament
    val framentHome: Fragment = HomeFragment()
    val framentKeranjang: Fragment = KeranjangFragment()
    val framentAkun: Fragment = AkunFragment()
    val fm : FragmentManager = supportFragmentManager
    var active : Fragment = framentHome //setDefaultFragment

    private lateinit var menu: Menu
    private lateinit var menuItem: MenuItem
    private lateinit var buttonNavigationView : BottomNavigationView

    //validasi sudah login atau belum
    private val statusLogin = false
    private lateinit var sP:SharedPref

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        sP = SharedPref(this)

        setButtonNav()
    }
    fun setButtonNav () {
        //Masukkan frame ke FragmentManager
        fm.beginTransaction().add(R.id.container, framentHome).show(framentHome).commit()
        fm.beginTransaction().add(R.id.container, framentAkun).hide(framentAkun).commit()
        fm.beginTransaction().add(R.id.container, framentKeranjang).hide(framentKeranjang).commit()

        buttonNavigationView = findViewById(R.id.nav_view)
        menu = buttonNavigationView.menu
        menuItem = menu.getItem(0)
        menuItem.isChecked = true

        buttonNavigationView.setOnNavigationItemSelectedListener { item ->

            when (item.itemId)  {
                R.id.navigation_home ->{
                    callFragment(0, framentHome)
                }
                R.id.navigation_keranjang ->{
                    callFragment(1, framentKeranjang)
                }
                R.id.navigation_akun ->{
                    if (sP.getStatusLogin()) {
                        callFragment(2, framentAkun)
                    } else {
                        startActivity(Intent(this, MasukActivity::class.java))
                    }
                }
            }

            false
        }
    }

    fun callFragment(int: Int, fragment: Fragment) {
        menuItem = menu.getItem(int)
        menuItem.isChecked = true
        fm.beginTransaction().hide(active).show(fragment).commit()
        active = fragment
    }
}