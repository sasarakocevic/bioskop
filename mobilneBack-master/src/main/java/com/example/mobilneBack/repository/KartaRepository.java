package com.example.mobilneBack.repository;

import com.example.mobilneBack.entity.Karta;
import org.springframework.data.jpa.repository.JpaRepository;

public interface KartaRepository extends JpaRepository<Karta,Integer> {
}