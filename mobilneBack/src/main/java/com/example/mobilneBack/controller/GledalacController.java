package com.example.mobilneBack.controller;

import com.example.mobilneBack.entity.*;
import com.example.mobilneBack.repository.KartaRepository;
import com.example.mobilneBack.service.GledalacService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
public class GledalacController {
    @Autowired
    private GledalacService gledalacService;

    @Autowired
    private KartaRepository kartaRepository;

    @PostMapping("/addGledalac")
    public Gledalac addGledalac(@RequestBody Gledalac gledalac) {
        try {

            Karta karta =
                    kartaRepository.findById(gledalac.getKarta().getId())
                            .orElseThrow(() -> new IllegalArgumentException());


            gledalac.setKarta(karta);


            return gledalacService.addGledalac(gledalac);
        } catch (Exception e) {
            throw e;
        }
    }

    @GetMapping("/getGledalac")
    public List<Gledalac> getGledalac(){
        return gledalacService.getGledalac();
    }
}
