<?php

namespace App\Export;

class RmUmumExport
{
    public static function uploadImageStore($fileImage, $nama)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = "rm_umum_".$nama."_".date('Y-m-d H:i:s').".".$ext;
      $fileImage->move(base_path("public//assets/img/storage/rm_umum/"), $name);

      return $name;
    }

    public static function getLinkDownloadUmum()
    {
        return public_path()."/assets/img/storage/rm_umum.docx";
    }

    public static function getLinkDownloadPasien($name)
    {
        return public_path()."/assets/img/storage/rm_umum/".$name;
    }
}
