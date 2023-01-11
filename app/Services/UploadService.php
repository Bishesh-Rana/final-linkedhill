<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    protected string $upload_directory = 'images';
    public function __construct()
    {
    }
    public function setUploadDirectory(string $upload_directory): self
    {
        $this->upload_directory = $upload_directory;
        return $this;
    }
    public function handleUploadFile(UploadedFile $file): string
    {
        $file_name = $this->getTargetFileName($file);
        $ext = $file->getClientOriginalExtension();
        $new_name = date('YmdHisv') . bin2hex(random_bytes(3)) . '.' . $ext;
        Storage::disk('public')->put($this->getUploadDirectory() . $new_name, \File::get($file));
        $image_url = Storage::url($this->getUploadDirectory() . $new_name);
        return $image_url;
    }
    private function getTargetFileName(UploadedFile $file): string
    {
        // If there's no existing file with the same name in the upload directory, use the original name.
        // Otherwise, prefix the original name with a hash.
        // The whole point is to keep a readable file name when we can.
        if (!file_exists($this->getUploadDirectory() . $file->getClientOriginalName())) {
            return $file->getClientOriginalName();
        }
        return $this->getUniqueHash() . '_' . $file->getClientOriginalName();
    }
    private function getUploadDirectory(): string
    {
        if (!is_dir($this->upload_directory)) {
            mkdir($this->upload_directory, 077, true);
        }
        return $this->upload_directory . DIRECTORY_SEPARATOR;
    }
    private function getUniqueHash(): string
    {
        return substr(sha1(uniqid()), 0, 6);
    }
    public function storeBase64Image($base64_image, string $path = "/")
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
            $data = substr($base64_image, strpos($base64_image, ',') + 1);
            $data = base64_decode($data);
            $new_name = date('YmdHisv') . bin2hex(random_bytes(3)) . '.png';
            Storage::disk('public')->put($this->getUploadDirectory() . $new_name, $data);
            $image_url = Storage::url($this->getUploadDirectory() . $new_name);
            return asset($image_url);
        } else {
            throw new \Exception("Images is not in encoded form", 500);
        }
    }
    public function unlinkUploadFile(string $file_path): bool
    {
        if (!file_exists(public_path($file_path)))
            return false;
        unlink(public_path($file_path));
        return true;
    }
}
