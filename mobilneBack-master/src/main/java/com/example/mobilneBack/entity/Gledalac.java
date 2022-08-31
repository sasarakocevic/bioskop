package com.example.mobilneBack.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;

@Data
@AllArgsConstructor
@NoArgsConstructor
@Entity
@Table(name = "gledalac")
public class Gledalac {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int id;
    private String ime;
    private String prezime;
}
