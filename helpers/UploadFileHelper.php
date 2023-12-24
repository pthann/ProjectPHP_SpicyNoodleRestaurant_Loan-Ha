<?php

require_once("configs/UploadFileConfig.php");

class UploadFileHelper {
    private $allowedExtensions;
    private $maxFileSize;
    private $uploadDirectory;

    public function __construct() {
        $this->allowedExtensions = ALLOWED_EXTENSIONS;
        $this->maxFileSize = MAX_FILE_SIZE;
        $this->uploadDirectory = UPLOAD_DIRECTORY;
    }

    public function addSubDirectory($uploadDirectory) {
        $this->uploadDirectory = UPLOAD_DIRECTORY . $uploadDirectory;
    }

    public function uploadFile($file) {
        $errors = [];
        // Check file size
        if ($file['size'] > $this->maxFileSize) {
            $errors[] = 'File size exceeds allowed limit.';
        }
        // Check file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array($fileExtension, $this->allowedExtensions)) {
            $errors[] = 'Invalid file format.';
        }
        // Check errror occurred while uploading the file
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'An error occurred while uploading the file.';
        }
        // Create directory if not exist
        if (!file_exists($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0777, true);
        }
        // Store file
        if (empty($errors)) {
            $destination = $this->uploadDirectory . '/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $destination);
            return $destination;
        } else {
            return $errors;
        }
    }

    public function deleteFile($fileName) {
        if (file_exists($this->uploadDirectory . '/' . $fileName)) {
            unlink($this->uploadDirectory . '/' . $fileName);
            return true;
        } else {
            return false;
        }
    }
}
