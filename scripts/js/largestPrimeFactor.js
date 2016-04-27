/*
 * Attempts to factor a number using a combination of trial division up to sqrt(number)
 * and the fact that all primes past 2 and 3 are in either the form 6x-1 or 6x+1
 * References:
 * https://primes.utm.edu/notes/faq/six.html
 * http://mathforum.org/library/drmath/view/56068.html
 */
function calculateLargestPrimeFactor(number) {

    var largestPrime = 1;
    
    // Check 2
    var checkTwo = 2;
    while (number % checkTwo == 0) {
        largestPrime = checkTwo;
        number /= checkTwo;
        if (!checkNumberComposite(checkTwo, number)) {
            largestPrime = number;
            break;
        }
    }
    
    // Check 3
    var checkThree = 3;
    while (number % checkThree == 0) {
        largestPrime = checkThree;
        number /= checkThree;
        if (!checkNumberComposite(checkThree, number)) {
            largestPrime = number;
            break;
        }
    }
    
    // All primes past 2 and 3 are in either the form 6x-1 or 6x+1
    var checkSixMultiples = 6;
    while ((checkSixMultiples-1) <= number) {
        // 6x-1
        while (number % (checkSixMultiples-1) == 0) {
            largestPrime = checkSixMultiples-1;
            number /= largestPrime;
        }
        // 6x+1
        while (number % (checkSixMultiples+1) == 0) {
            largestPrime = checkSixMultiples+1;
            number /= largestPrime;
        }
        checkSixMultiples += 6;
        if (!checkNumberComposite(checkSixMultiples, number)) {
            largestPrime = number;
            break;
        }
    }
    
    return largestPrime;
}
/*
 * Every composite number (not prime) has a prime factor less than or equal to its square root.
 * If the square of current iteration is larger than current number to be factored then the remaining number
 * can no longer be considered a composite and is thus a prime number (and also the largest prime).
 */
function checkNumberComposite(iteration, currNumber) {
    isComposite = true;
    if (iteration*iteration > currNumber && currNumber > 1) {
        isComposite = false;
    }
    return isComposite;
}