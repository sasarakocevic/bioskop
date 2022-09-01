package com.example.mobilneBack.service;


import com.example.mobilneBack.entity.Gledalac;
import com.example.mobilneBack.repository.GledalacRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class GledalacService {

    @Autowired
    private GledalacRepository gledalacRepository;

    public Gledalac addGledalac(Gledalac gledalac){
        return gledalacRepository.save(gledalac);
    }

    public List<Gledalac> getGledalac(){
        return gledalacRepository.findAll();
    }
}
