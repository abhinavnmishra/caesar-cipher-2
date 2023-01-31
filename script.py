from selenium import webdriver

# create a new Firefox browser instance
driver = webdriver.Firefox()
# navigate to the webpage
driver.get("http://localhost/lab_project/index.php")

input_string = "Hello World"

# Encryption Test
string_input = driver.find_element("name", "string")
string_input.send_keys(input_string)
encrypt_button = driver.find_element("name", "encrypt")
encrypt_button.click()
# check for the expected encrypted string
encrypted_string = driver.find_element("name", "output").text

# Decryption Test
encrypted_string_input = driver.find_element("name", "encrypted_string")
encrypted_string_input.send_keys(encrypted_string)
decrypt_button = driver.find_element("name", "decrypt")
decrypt_button.click()

decrypted_string = driver.find_element("name", "output").text

assert decrypted_string == input_string

if decrypted_string == input_string:
    print("success")
else:
    print("failure")

# check for the expected decrypted
