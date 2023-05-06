<?php
class Pagination
{
    public $ligne;
    public function Pagination_Btn($tab, $page)
    {
        $len = count($tab);
        $nb = $len / $this->ligne;
        $inputs = [];
        for ($i = 1; $i < $nb + 1; $i++) {
            if ($page == $i)
                $inputs[] = "<a href='?get=$i'><button id='page'>$i</button></a>";
            else
                $inputs[] = "<a href='?get=$i'><button id='btn'>$i</button></a>";
        }
        return $inputs;
    }

    public function GetTablePage($tab,$nb)
    {
        if ($tab) {
            $n = $nb * $this->ligne;
            $key = key($tab[0]);
            for ($i = $n - $this->ligne; $i < $n; $i++) {
                echo "<tr>";
                if ($i >= count($tab)) {
                    break;
                };
                foreach ($tab[$i] as $col) {
                    echo "<td> $col </td>";
                }
                echo " </tr>";
            }
        }
    }
   

    public function Pagination_Nb($tab, $nb_page)
    {
        $tab3 = array_slice($tab, 0, 3);
        $nb = 0;
        if ($nb_page == 1) {
            for ($i = 0; $i < 3; $i++) {
                if (isset($tab3[$i]))
                    echo $tab3[$i];
            }
        }
        if ($nb_page < count($tab) and $nb_page != 1) {
            $nb = 2;
        } elseif ($nb_page != 1) {
            $nb = 3;
        }
        if ($nb != 0) {
            for ($i = 0; $i < $nb + 1; $i++) {
                if (isset($tab[$nb_page - ($nb - $i)])) {
                    $tab3[$i] = $tab[$nb_page - ($nb - $i)];
                    echo $tab3[$i];
                }
            }
        }
    }
}