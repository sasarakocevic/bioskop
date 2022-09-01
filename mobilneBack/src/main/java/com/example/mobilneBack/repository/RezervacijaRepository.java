package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Rezervacija;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

public interface RezervacijaRepository extends JpaRepository<Rezervacija, Integer> {


}
