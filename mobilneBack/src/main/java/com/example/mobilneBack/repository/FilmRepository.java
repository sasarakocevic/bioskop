package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Film;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

public interface FilmRepository extends JpaRepository<Film, Integer> {
    Film findByName(String name);

    @Query(value = "SELECT f.name, COUNT(f.id) AS `broj_projekcija`\n" +
            "FROM rezervacija r, film f\n" +
            "WHERE r.film_id = f.id AND r.datum > date_sub(NOW(), INTERVAL 1 DAY)\n" +
            "GROUP BY f.name\n" +
            "ORDER BY `broj_projekcija` DESC\n" +
            "LIMIT 1", nativeQuery = true)
    String getNajcesci();
}
