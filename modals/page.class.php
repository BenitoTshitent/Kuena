<?php


class page
{
    private $id=0;
    private $id_page="";
    private $id_membre=0;
    private $nb_vue=0;
    private $som_page=0.0;
    private $breaked=0;
    private $created_at="";

    /**
     * page constructor.
     * @param int $id_page
     * @param int $id_membre
     * @param int $nb_vue
     * @param int $som_page
     * @param int $breaked
     * @param string $created_at
     */
    public function __construct($id_page, $id_membre, $nb_vue, $som_page, $breaked, $created_at)
    {
        $this->id_page = $id_page;
        $this->id_membre = $id_membre;
        $this->nb_vue = $nb_vue;
        $this->som_page = $som_page;
        $this->breaked = $breaked;
        $this->created_at = $created_at;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdPage(): string
    {
        return $this->id_page;
    }

    /**
     * @param string $id_page
     */
    public function setIdPage(string $id_page)
    {
        $this->id_page = $id_page;
    }

    /**
     * @return int
     */
    public function getIdMembre(): int
    {
        return $this->id_membre;
    }

    /**
     * @param int $id_membre
     */
    public function setIdMembre(int $id_membre)
    {
        $this->id_membre = $id_membre;
    }

    /**
     * @return int
     */
    public function getNbVue(): int
    {
        return $this->nb_vue;
    }

    /**
     * @param int $nb_vue
     */
    public function setNbVue(int $nb_vue)
    {
        $this->nb_vue = $nb_vue;
    }

    /**
     * @return double
     */
    public function getSomPage(): double
    {
        return $this->som_page;
    }

    /**
     * @param double $som_page
     */
    public function setSomPage(double $som_page)
    {
        $this->som_page = $som_page;
    }

    /**
     * @return int
     */
    public function getBreaked(): int
    {
        return $this->breaked;
    }

    /**
     * @param int $breaked
     */
    public function setBreaked(int $breaked)
    {
        $this->breaked = $breaked;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }


}