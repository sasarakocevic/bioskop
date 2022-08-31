package com.example.mobilneBack.controller;

import com.example.mobilneBack.entity.Film;
import com.example.mobilneBack.service.FilmService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class FilmController {

    @Autowired
    private FilmService filmService;

    @PostMapping("/addFilm")
    public Film addFilm(@RequestBody Film film){
        return filmService.addFilm(film);
    }

    @GetMapping("/films")
    public List<Film> getFilms(){
        return filmService.getFilms();
    }

    @GetMapping("/film/{id}")
    public Film findFilmsById(@PathVariable int id){
        return filmService.getFilmsById(id);
    }
    @GetMapping("/product/{name}")
    public Film findFilmsByName(@PathVariable String name){
        return filmService.getFilmByName(name);
    }

    @PutMapping("/updateFilm")
    public Film updateFilm(@RequestBody Film film){
        return filmService.updateFilm(film);
    }

    @DeleteMapping("/deleteFilm/{id}")
    public String deleteFilm(@PathVariable int id){
        return filmService.deleteFilm(id);
    }

}
