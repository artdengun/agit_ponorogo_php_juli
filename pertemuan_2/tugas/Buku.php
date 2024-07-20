<?php

namespace tugas;

class Buku
{
    private $judul;
    private $penulis;
    private $isbn;

    public function __construct($judul, $penulis, $isbn)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->isbn = $isbn;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setJudul($judul): void
    {
        $this->judul = $judul;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setPenulis($penulis): void
    {
        $this->penulis = $penulis;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }




}