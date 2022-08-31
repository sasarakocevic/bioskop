package com.example.mobilneBack.controller;

import com.example.mobilneBack.entity.Film;
import com.example.mobilneBack.entity.Sala;
import com.example.mobilneBack.service.SalaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class SalaController {

    @Autowired
    private SalaService salaService;

    @PostMapping("/addSala")
    public Sala addSala(@RequestBody Sala sala){
        return salaService.addSala(sala);
    }
}
