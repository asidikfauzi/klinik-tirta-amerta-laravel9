<?php

namespace App\Export;

class RmUmumExport
{
    public static function uploadFileUmum($fileImage)
    {
      $ext = $fileImage->getClientOriginalExtension();
      $name = "rm_umum_".rand().".".$ext;
      $destinationPath= public_path("assets/img/storage/rm_umum");
      $fileImage->move($destinationPath, $name);

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
