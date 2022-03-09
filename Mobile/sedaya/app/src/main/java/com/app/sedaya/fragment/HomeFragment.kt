package com.app.sedaya.fragment

import android.content.Intent
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.LinearLayout
import android.widget.ProgressBar
import android.widget.TextView
import androidx.appcompat.widget.SearchView
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout
import androidx.viewpager.widget.ViewPager
import com.app.sedaya.R
import com.app.sedaya.activity.LoginActivity
import com.app.sedaya.activity.RiwayatActivity
import com.app.sedaya.adapter.AdapterListSeni
import com.app.sedaya.adapter.AdapterRekomSeni
import com.app.sedaya.adapter.AdapterSeni
import com.app.sedaya.adapter.AdapterSlider
import com.app.sedaya.app.ApiConfig
import com.app.sedaya.databinding.FragmentHomeBinding
import com.app.sedaya.helper.SharedPref
import com.app.sedaya.model.ResponModel
import com.app.sedaya.model.Seni
import com.google.android.material.card.MaterialCardView
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class HomeFragment : Fragment() {

    private var _binding: FragmentHomeBinding? = null
    private val binding get() = _binding!!

    lateinit var sP:SharedPref
    lateinit var vpSlider : ViewPager
    lateinit var rvSeni: RecyclerView
    lateinit var rvSeniRekom: RecyclerView
    lateinit var tvWelcome: TextView
    lateinit var tvNama: TextView
    lateinit var swipeRefresh : SwipeRefreshLayout
    lateinit var layout_selamatdatang : MaterialCardView
    lateinit var layout_sliderseni : LinearLayout
    lateinit var btn_riwayat : ImageView
    lateinit var no_data : TextView
    lateinit var tvError : TextView
    lateinit var SearchView : SearchView
    lateinit var pb : ProgressBar
    lateinit var rvSearchSeni: RecyclerView
    private var listRekomSeni: ArrayList<Seni> = ArrayList()
    private var listSeni: ArrayList<Seni> = ArrayList()
//    lateinit var rvProdukTerlasir: RecyclerView
//    lateinit var rvElektronik: RecyclerView

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {

        _binding = FragmentHomeBinding.inflate(layoutInflater)

        val view : View = inflater.inflate(R.layout.fragment_home, container, false)
        mainButton()

        sP = SharedPref(requireActivity())
        swipeRefresh = view.findViewById(R.id.swipeRefresh)
        btn_riwayat = view.findViewById(R.id.btn_riwayat)
        if (sP.getStatusLogin()){
            btn_riwayat.setOnClickListener {
                startActivity(Intent(requireContext(), RiwayatActivity::class.java))
            }
        }else{
            btn_riwayat.setOnClickListener {
                startActivity(Intent(requireContext(), LoginActivity::class.java))
            }
        }


        tvWelcome = view.findViewById(R.id.tv_welcome)
        tvNama = view.findViewById(R.id.tv_nama)
        if (sP.getStatusLogin()) {
            val user = sP.getUser()!!
            tvWelcome.setText("Hai, "+user.nama)
        }


        init(view)
        getSeni()
        getRekomSeni()
        displaySeni()
        refresh()
        displaySearch()
        return view
    }

    fun displaylistSeni() {
        rvSearchSeni.adapter = AdapterListSeni(requireActivity(), listSeni)
    }

    private fun mainButton() {
//        btn_riwayat.setOnClickListener {
//            startActivity(Intent(requireContext(), RiwayatActivity::class.java))
//        }
    }
    private fun refresh() {
        swipeRefresh.setOnRefreshListener {
            getSeni()
            getRekomSeni()
            swipeRefresh.isRefreshing = false
        }
    }

    fun displaySeni() {
        val arrSlider = ArrayList<Int>()
        arrSlider.add(R.drawable.slider1)
        arrSlider.add(R.drawable.slider2)
        arrSlider.add(R.drawable.slider3)

        val adapterSlider = AdapterSlider(arrSlider, activity)
        vpSlider.adapter = adapterSlider

        val layoutManager = LinearLayoutManager(activity)
        layoutManager.orientation = LinearLayoutManager.HORIZONTAL

        val layoutManager2 = LinearLayoutManager(activity)
        layoutManager2.orientation = LinearLayoutManager.HORIZONTAL

        val layoutManager3 = LinearLayoutManager(activity)
        layoutManager3.orientation = LinearLayoutManager.HORIZONTAL

        rvSeni.adapter = AdapterSeni(requireActivity(), listSeni)
        rvSeni.layoutManager = layoutManager

        rvSeniRekom.adapter = AdapterRekomSeni(requireActivity(), listRekomSeni)
        rvSeniRekom.layoutManager = layoutManager2

//        rvElektronik.adapter = AdapterSeni(requireActivity(), listSeni)
//        rvElektronik.layoutManager = layoutManager2

//        rvProdukTerlasir.adapter = AdapterSeni(requireActivity(), listSeni)
//        rvProdukTerlasir.layoutManager = layoutManager3
    }

    fun getRekomSeni() {
        ApiConfig.instanceRetrofit.getRekomSeni().enqueue(object : Callback<ResponModel> {
            override fun onFailure(call: Call<ResponModel>, t: Throwable) {

            }

            override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                val res = response.body()!!
                if (res.code == 200) {
                    listRekomSeni = res.seni
                    displaySeni()
                }
            }
        })
    }
    fun getSeni() {
        ApiConfig.instanceRetrofit.getSeniTerbaru().enqueue(object : Callback<ResponModel> {
            override fun onFailure(call: Call<ResponModel>, t: Throwable) {

            }

            override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                val res = response.body()!!
                if (res.code == 200) {
                    listSeni = res.seni
                    displaySeni()
                }
            }
        })
    }
    private fun displaySearch() {

        SearchView.setOnQueryTextListener(object : SearchView.OnQueryTextListener{
            override fun onQueryTextSubmit(query: String?): Boolean {
                if (query?.isEmpty() == true){
                    layout_sliderseni.visibility = View.VISIBLE
                    rvSearchSeni.visibility = View.GONE
                } else{
                    pb.visibility = View.VISIBLE
                    layout_sliderseni.visibility = View.GONE
                    ApiConfig.instanceRetrofit.getSearch(query?.toLowerCase()!!).enqueue(object :  Callback<ResponModel>{
                        override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                            pb.visibility = View.GONE
                            val res = response.body()!!
                            if (res.code == 200) {
                                rvSearchSeni.visibility = View.VISIBLE
                                listSeni = res.seni
                                displaylistSeni()
                            }else if (res.seni == null){
                                no_data.visibility = View.VISIBLE
                                error(res.message)
                            }
                        }

                        override fun onFailure(call: Call<ResponModel>, t: Throwable) {
                            pb.visibility = View.GONE
                            tvError.visibility = View.VISIBLE
                            error(t.message.toString())
                        }

                    })
                }

                return false
            }

            override fun onQueryTextChange(newText: String?): Boolean {
                if (newText?.isEmpty() == true){
                    layout_sliderseni.visibility = View.VISIBLE
                    rvSearchSeni.visibility = View.GONE
                } else{
                    pb.visibility = View.VISIBLE
//                    rvSearchSeni.visibility = View.VISIBLE
                    layout_sliderseni.visibility = View.GONE
                    ApiConfig.instanceRetrofit.getSearch(newText?.toLowerCase()!!).enqueue(object :  Callback<ResponModel>{
                        override fun onResponse(call: Call<ResponModel>, response: Response<ResponModel>) {
                            pb.visibility = View.GONE
                            val res = response.body()!!
                            if (res.code == 200) {
                                rvSearchSeni.visibility = View.VISIBLE
                                listSeni = res.seni
                                displaylistSeni()
                            }else if (res.seni == null){
                                no_data.visibility = View.VISIBLE
                                error(res.message)
                            }
                        }

                        override fun onFailure(call: Call<ResponModel>, t: Throwable) {
                            pb.visibility = View.GONE
                            tvError.visibility = View.VISIBLE
                            error(t.message.toString())
                        }

                    })
                }

                return false
            }

        })
    }

    fun init(view: View) {
        vpSlider = view.findViewById(R.id.vp_slider)
        rvSeni = view.findViewById(R.id.rv_seni)
        rvSeniRekom = view.findViewById(R.id.rv_senirekom)
        layout_selamatdatang = view.findViewById(R.id.layout_selamatdatang)
        layout_sliderseni = view.findViewById(R.id.layout_sliderseni)
        no_data = view.findViewById(R.id.tv_noData)
        tvError = view.findViewById(R.id.tv_noData)
        SearchView = view.findViewById(R.id.edt_search)
        pb = view.findViewById(R.id.pb)
        rvSearchSeni = view.findViewById(R.id.rv_searchSeni)
    }
}