package com.exomatik.sistemarsip.ui.main

import android.os.CountDownTimer
import android.view.View
import androidx.appcompat.app.AppCompatActivity
import com.exomatik.sistemarsip.R
import com.exomatik.sistemarsip.base.BaseFragment
import androidx.navigation.fragment.findNavController
import kotlinx.android.synthetic.main.fragment_splash.view.*

class SplashFragment : BaseFragment() {
    override fun getLayoutResource(): Int = R.layout.fragment_splash

    override fun myCodeHere() {
        (activity as AppCompatActivity).supportActionBar?.hide()
        v.progress.visibility = View.VISIBLE
        object : CountDownTimer(2000, 1000) {
            override fun onTick(millisUntilFinished: Long) {
            }

            override fun onFinish() {
                findNavController().navigate(R.id.nav_beranda)
            }
        }.start()
    }

}