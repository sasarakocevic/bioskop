package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Rezervacija;
import org.springframework.data.jpa.repository.JpaRepository;

public interface RezervacijaRepository extends JpaRepository<Rezervacija, Integer> {
}
