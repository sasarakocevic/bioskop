package com.example.mobilneBack.controller;

import com.example.mobilneBack.entity.Film;
import com.example.mobilneBack.entity.Rezervacija;
import com.example.mobilneBack.entity.Sala;
import com.example.mobilneBack.repository.FilmRepository;
import com.example.mobilneBack.repository.SalaRepository;
import com.example.mobilneBack.service.RezervacijaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class RezervacijeController {

    @Autowired
    private RezervacijaService rezervacijaService;
    @Autowired
    private SalaRepository salaRepository;
    @Autowired
    private FilmRepository filmRepository;

    @PostMapping("/addRezervacija")
    public Rezervacija addRezervacija(@RequestBody Rezervacija rezervacija) {
        try {

            Sala sala =
                    salaRepository.findById(rezervacija.getSala().getId())
                            .orElseThrow(() -> new IllegalArgumentException());
            Film film = filmRepository.findById(rezervacija.getFilm().getId())
                    .orElseThrow(() -> new IllegalArgumentException());

            rezervacija.setSala(sala);
            rezervacija.setFilm(film);

            return rezervacijaService.addRezervacija(rezervacija);
        } catch (Exception e) {
            throw e;
        }
    }


}
