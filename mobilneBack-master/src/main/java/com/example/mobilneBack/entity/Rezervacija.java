package com.example.mobilneBack.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "rezervacija")
public class Rezervacija {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int id;
    private String datum;
    private String vrijeme;

    @ManyToOne(targetEntity = Sala.class,cascade = CascadeType.ALL)
    @JoinColumn(name = "salaId", referencedColumnName = "id")
    private Sala sala;

    @ManyToOne(targetEntity = Film.class,cascade = CascadeType.ALL)
    @JoinColumn(name = "filmId", referencedColumnName = "id")
    private Film film;
}
