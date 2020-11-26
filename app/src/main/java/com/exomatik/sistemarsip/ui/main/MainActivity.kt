package com.exomatik.sistemarsip.ui.main

import android.view.View
import com.exomatik.sistemarsip.R
import com.exomatik.sistemarsip.base.BaseActivity

class MainActivity : BaseActivity() {
    override fun getLayoutResource(): Int = R.layout.activity_home
    private lateinit var view: View

    override fun myCodeHere() {
        setTheme(R.style.CustomTheme)

        view = findViewById(android.R.id.content)
    }
}