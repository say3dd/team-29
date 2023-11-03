package com.example.demo.student;

import org.springframework.boot.CommandLineRunner;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.time.LocalDate;
import java.time.Month;
import java.util.List;

import static java.time.Month.*;

@Configuration
public class StudentConfig {
    @Bean
    CommandLineRunner commandLineRunner(StudentRepository repository){
        return args -> {
        Student abu = new Student(
                    "Abu",
                    "example@gmail.com",
                    LocalDate.of(2001, JULY, 11)
            );

            Student rick = new Student(
                    "Rick",
                    "rick-example@gmail.com",
                    LocalDate.of(2002, MAY, 5)
            );

            repository.saveAll(List.of(abu, rick));
        };
    }
}
