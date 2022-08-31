package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Film;
import org.springframework.data.jpa.repository.JpaRepository;

public interface FilmRepository extends JpaRepository<Film, Integer> {
    Film findByName(String name);
}
