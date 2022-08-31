package com.example.mobilneBack.service;

import com.example.mobilneBack.entity.Film;
import com.example.mobilneBack.entity.Sala;
import com.example.mobilneBack.repository.SalaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class SalaService {

    @Autowired
    private SalaRepository salaRepository;

    public Sala addSala(Sala sala){
        return salaRepository.save(sala);
    }

}
