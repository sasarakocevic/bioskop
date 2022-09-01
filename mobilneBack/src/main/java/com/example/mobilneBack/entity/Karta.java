package com.example.mobilneBack.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "karta")
public class Karta {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int id;

    @ManyToOne(targetEntity = Rezervacija.class,cascade = CascadeType.ALL)
    @JoinColumn(name = "rezervacijaId", referencedColumnName = "id")
    private Rezervacija rezervacija;

}
