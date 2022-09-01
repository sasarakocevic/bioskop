package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Karta;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface KartaRepository extends JpaRepository<Karta,Integer> {

    @Query(value = "SELECT COUNT(k.id) as 'broj_karata', s.broj_mjesta, s.naziv_sale, f.name\n" +
            "FROM karta k, rezervacija r, sala s, film f\n" +
            "WHERE r.sala_id = s.id AND k.rezervacija_id = r.id AND r.film_id = f.id\n" +
            "GROUP BY r.id\n" +
            "LIMIT 1", nativeQuery = true)
    String popunjenost();
}