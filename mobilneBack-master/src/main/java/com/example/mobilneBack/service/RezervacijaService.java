package com.example.mobilneBack.service;

import com.example.mobilneBack.entity.Rezervacija;
import com.example.mobilneBack.repository.RezervacijaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class RezervacijaService {

    @Autowired
    private RezervacijaRepository rezervacijaRepository;

    public Rezervacija addRezervacija(Rezervacija rezervacija){
        return rezervacijaRepository.save(rezervacija);
    }
}
