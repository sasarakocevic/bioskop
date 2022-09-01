package com.example.mobilneBack.service;

import com.example.mobilneBack.entity.Film;
import com.example.mobilneBack.entity.Karta;
import com.example.mobilneBack.repository.FilmRepository;
import com.example.mobilneBack.repository.SalaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class FilmService {

    @Autowired
    private FilmRepository filmRepository;

    public Film addFilm(Film film){
        return filmRepository.save(film);
    }

    public List<Film> getFilms(){
        return filmRepository.findAll();
    }
    public Film getFilmsById(int id){
        return filmRepository.findById(id).orElse(null);
    }

    //u service pozivamo metodu koju smo napravili u repo
    public Film getFilmByName(String name){
        return filmRepository.findByName(name);
    }

    public String deleteFilm(int id){
        filmRepository.deleteById(id);
        return "Film deleted!" + id;
    }
    public Film updateFilm(Film film){
        Film existingFilm = filmRepository.findById(film.getId()).orElse(null);
        existingFilm.setName(film.getName());
        existingFilm.setGenre(film.getGenre());
        existingFilm.setDuration(film.getDuration());
        return filmRepository.save(existingFilm);
    }

    public String getNajcesci(){
        return filmRepository.getNajcesci();
    }
}
