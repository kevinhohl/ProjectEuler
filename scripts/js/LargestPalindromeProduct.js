/*
 * Calculates the largest palindrome product by iterating backwards from the 
 * maximum to the minimum and finding the product of each. 
 * Loop stops when a palindrome is found.
 * Added a check for mod 10 as any product of this can never be a palindrome.
 */
function calculateLargestPalindromeProduct(numDigits) {

    maxNum = Math.pow(10,numDigits) - 1;
    minNum = Math.pow(10,numDigits-1);
    
    found = false;
    largestPalindrome = 0;
    for (firstNum = maxNum; firstNum >= minNum ; firstNum--) { 
        if (firstNum % 10 == 0) {
            continue; // numbers ending in 0 can never be palindromes (reduces about 10% of iterations)
        }
        for (secondNum = maxNum; secondNum >= minNum; secondNum--) { 
            if (secondNum % 10 == 0) {
                continue; 
            }
            product = firstNum * secondNum;
            if (checkPalindrome(product)) {
                largestPalindrome = product;
                found = true;
                break;
            }
        }
        if (found){break;}
    }
    return largestPalindrome;
}
/*
 * check if variable passed in is a palindrome
 */
function checkPalindrome(reverseThis) {
    reverseThis = reverseThis.toString();
    sihTesrever = reverseThis.split("").reverse().join("");
    if (reverseThis == sihTesrever) {
        return true;
    } 
    return false;
}