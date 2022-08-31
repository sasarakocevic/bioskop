package com.example.mobilneBack.service;

import com.example.mobilneBack.entity.Karta;
import com.example.mobilneBack.repository.KartaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class KartaService {

    @Autowired
    private KartaRepository kartaRepository;

    public Karta addKarta(Karta karta){
        return kartaRepository.save(karta);
    }
}
