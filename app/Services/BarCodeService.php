<?php

namespace App\Services;
use Milon\Barcode\DNS1D;
use App\Models\BarCode;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class BarCodeService
{
    /**
     * Stwórz kod kreskowy
     *
     * @param string $name
     * @param string $value
     *
     */
    public function createBarCode(string $name, string $value)
    {
        try{
            DB::beginTransaction();

            $barcode = new BarCode(
                [
                    'name' =>  $name,
                    'value' =>  $value,
                    'path' =>   self::generateBarCode($value)
                ]
            );

            $barcode->save();
            DB::commit();

            return redirect('/');

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Konwertuj tekst na cyfry
     *
     * @param string $value
     *
     */
    public function alphabetToNumber(string $value): string
    {
        $input = strtoupper($value);
        $result = '';

        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];

            if (ctype_alpha($char)) {
                $position = ord($char) - ord('A') + 1;
                $result .= $position;
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    /**
     * Generuj kod kreskowy w formacie webp
     *
     * @param string $value
     *
     */
    public function generateBarCode(string $value): string
    {
        $inputPath = DNS1D::getBarcodePNGPath(self::alphabetToNumber($value), 'C39');
        $outputPath = $value . '.webp';
        if (File::exists(public_path($inputPath))) {

            $image = Image::make(public_path($inputPath));

            if($image->save($outputPath, 80)) {
                File::delete(public_path($inputPath));
            }
            return $outputPath;
        }
    }
}
